document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.querySelector('[data-critical-injury-category]');
    const dice1Input = document.querySelector('[data-critical-injury-dice1]');
    const dice2Input = document.querySelector('[data-critical-injury-dice2]');
    const diceResultDisplay = document.querySelector('[data-critical-injury-result]');
    const lookupButton = document.querySelector('[data-critical-injury-lookup-button]');
    const statusDisplay = document.querySelector('[data-critical-injury-status]');
    const cardTitle = document.querySelector('.panel[data-generator-panel="critical-injury"] .card-title');

    function updateDiceResult() {
        const dice1 = parseInt(dice1Input.value) || 1;
        const dice2 = parseInt(dice2Input.value) || 1;
        const result = (dice1 * 10) + dice2;
        diceResultDisplay.textContent = result;
    }

    function setLoading(isLoading) {
        lookupButton.disabled = isLoading;
        statusDisplay.textContent = isLoading ? 'Looking up injury...' : 'Ready to look up injuries.';
    }

    function rollDice(diceString) {
        // Parse strings like "D6", "2D6", "3D6", etc.
        const match = diceString.match(/^(\d*)D(\d+)$/i);
        if (!match) return null;
        
        const numDice = parseInt(match[1]) || 1;
        const diceSize = parseInt(match[2]);
        
        if (numDice <= 0 || diceSize <= 0) return null;
        
        let total = 0;
        for (let i = 0; i < numDice; i++) {
            total += Math.floor(Math.random() * diceSize) + 1;
        }
        return total;
    }

    function formatRollResult(diceString, rollValue) {
        // Format the roll result with context
        if (diceString.includes('days')) {
            return `${rollValue} day${rollValue !== 1 ? 's' : ''}`;
        } else if (diceString.includes('hours')) {
            return `${rollValue} hour${rollValue !== 1 ? 's' : ''}`;
        } else if (diceString.includes('turns')) {
            return `${rollValue} turn${rollValue !== 1 ? 's' : ''}`;
        } else if (diceString.includes('minutes')) {
            return `${rollValue} minute${rollValue !== 1 ? 's' : ''}`;
        }
        return `${rollValue}`;
    }

    function renderCriticalInjury(injuryData) {
        const category = categorySelect.value;
        const dice1 = parseInt(dice1Input.value);
        const dice2 = parseInt(dice2Input.value);
        const diceValue = (dice1 * 10) + dice2;

        console.log('Rendering injury:', injuryData);
        console.log('Category:', category, 'Dice value:', diceValue);

        // Update card title - select by data attribute
        const titleField = document.querySelector('[data-critical-injury-field="injury"]');
        if (titleField) {
            titleField.textContent = injuryData.injury || '-';
            console.log('Updated title to:', injuryData.injury);
        } else {
            console.warn('Title field not found');
        }

        // Update all fields with data attributes
        const fields = {
            'category': category.charAt(0).toUpperCase() + category.slice(1).replace('-', ' '),
            'dice_roll': diceValue.toString(),
            'lethal': (injuryData.lethal === true || injuryData.lethal === 1 || injuryData.lethal === 'true') ? 'Yes' : 'No',
            'time_limit': String(injuryData.time_limit || '-'),
            'effects': String(injuryData.effects || '-'),
            'healing_time': String(injuryData.healing_time || '-')
        };

        Object.keys(fields).forEach(fieldName => {
            const fieldElement = document.querySelector(`[data-critical-injury-field="${fieldName}"]`);
            if (fieldElement) {
                fieldElement.textContent = fields[fieldName];
                console.log(`Updated ${fieldName} to:`, fields[fieldName]);
                fieldElement.classList.add('flash');
                setTimeout(() => fieldElement.classList.remove('flash'), 600);
            } else {
                console.warn(`Field not found for: ${fieldName}`);
            }
        });

        // Add roll buttons for dice fields
        addRollButtons('time_limit', injuryData.time_limit);
        addRollButtons('healing_time', injuryData.healing_time);

        statusDisplay.textContent = 'Injury found!';
    }

    function addRollButtons(fieldName, fieldValue) {
        // Check if field value contains dice notation
        const diceMatch = String(fieldValue).match(/(\d*D\d+)/i);
        if (!diceMatch) return;

        const fieldElement = document.querySelector(`[data-critical-injury-field="${fieldName}"]`);
        if (!fieldElement) return;

        // Remove any existing roll elements
        const existingRoll = fieldElement.nextElementSibling;
        if (existingRoll && existingRoll.classList.contains('dice-roll-result')) {
            existingRoll.remove();
        }

        // Create roll button and result container
        const diceNotation = diceMatch[1];
        const rollContainer = document.createElement('div');
        rollContainer.className = 'dice-roll-result';
        rollContainer.innerHTML = `
            <button type="button" class="roll-button" data-roll-field="${fieldName}" data-roll-dice="${diceNotation}" title="Roll ${diceNotation}">
                🎲
            </button>
            <span class="roll-result" data-roll-result="${fieldName}"></span>
        `;

        fieldElement.parentElement.appendChild(rollContainer);

        // Add event listener
        const rollButton = rollContainer.querySelector('.roll-button');
        rollButton.addEventListener('click', function() {
            handleRoll(fieldName, diceNotation, fieldValue);
        });
    }

    function handleRoll(fieldName, diceNotation, originalValue) {
        const rollResult = rollDice(diceNotation);
        if (rollResult === null) return;

        const formattedResult = formatRollResult(originalValue, rollResult);
        const resultElement = document.querySelector(`[data-roll-result="${fieldName}"]`);
        
        if (resultElement) {
            resultElement.textContent = ` → ${formattedResult}`;
            resultElement.classList.add('flash');
            setTimeout(() => resultElement.classList.remove('flash'), 600);
            console.log(`Rolled ${diceNotation}: ${formattedResult}`);
        }
    }

    async function lookupCriticalInjury() {
        const category = categorySelect.value;
        const dice1 = parseInt(dice1Input.value);
        const dice2 = parseInt(dice2Input.value);

        console.log('Lookup triggered - Category:', category, 'Dice1:', dice1, 'Dice2:', dice2);

        if (dice1 < 1 || dice1 > 6 || dice2 < 1 || dice2 > 6) {
            statusDisplay.textContent = 'Error: Both dice must be between 1 and 6.';
            return;
        }

        setLoading(true);

        try {
            const url = `./api/critical_injury.php?category=${encodeURIComponent(category)}&dice1=${dice1}&dice2=${dice2}`;
            console.log('Fetching from:', url);
            const response = await fetch(url);
            const data = await response.json();

            console.log('API Response:', data);

            if (data.ok && data.injury) {
                console.log('Success - rendering injury:', data.injury);
                renderCriticalInjury(data.injury);
            } else {
                console.error('API Error:', data.error);
                statusDisplay.textContent = 'Error: ' + (data.error || 'Unknown error occurred.');
            }
        } catch (error) {
            console.error('Fetch exception:', error);
            statusDisplay.textContent = 'Error: Failed to fetch injury data.';
        } finally {
            setLoading(false);
        }
    }

    // Event listeners
    lookupButton.addEventListener('click', lookupCriticalInjury);
    dice1Input.addEventListener('change', updateDiceResult);
    dice1Input.addEventListener('input', updateDiceResult);
    dice2Input.addEventListener('change', updateDiceResult);
    dice2Input.addEventListener('input', updateDiceResult);

    // Initialize
    updateDiceResult();
    console.log('Critical Injuries Script Initialized');
    console.log('Category select:', categorySelect);
    console.log('Dice1 input:', dice1Input);
    console.log('Dice2 input:', dice2Input);
    console.log('Lookup button:', lookupButton);
    console.log('Status display:', statusDisplay);
});
