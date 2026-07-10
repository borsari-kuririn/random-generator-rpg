document.addEventListener('DOMContentLoaded', function () {
    var tableSelect = document.querySelector('[data-mishap-table]');
    var dice1Input = document.querySelector('[data-mishap-dice1]');
    var dice2Input = document.querySelector('[data-mishap-dice2]');
    var generateButton = document.querySelector('[data-mishap-generate-button]');
    var statusDisplay = document.querySelector('[data-mishap-status]');

    if (!tableSelect || !dice1Input || !dice2Input || !generateButton || !statusDisplay) {
        return;
    }

    function setLoading(isLoading) {
        generateButton.disabled = isLoading;
        generateButton.textContent = isLoading ? 'Generating...' : 'Generate Mishap';
        statusDisplay.textContent = isLoading
            ? 'Consulting mishap outcomes...'
            : 'Ready to roll a mishap.';
    }

    function renderMishap(mishap) {
        var entry = mishap.entry || {};
        var fields = {
            table_label: mishap.table_label || '-',
            result: entry.result || '-',
            effect: entry.effect || '-',
            severity: entry.severity || '-',
        };

        Object.keys(fields).forEach(function (fieldName) {
            var field = document.querySelector('[data-mishap-field="' + fieldName + '"]');
            if (!field) {
                return;
            }

            field.textContent = fields[fieldName];
            field.classList.add('flash');
            setTimeout(function () {
                field.classList.remove('flash');
            }, 500);
        });

        dice1Input.value = String(mishap.dice1 || 1);
        dice2Input.value = String(mishap.dice2 || 1);
    }

    async function generateMishap() {
        var table = tableSelect.value || 'magic';
        var dice1 = parseInt(dice1Input.value, 10) || 1;
        var dice2 = parseInt(dice2Input.value, 10) || 1;

        if (dice1 < 1 || dice1 > 6 || dice2 < 1 || dice2 > 6) {
            statusDisplay.textContent = 'Both dice must be between 1 and 6.';
            return;
        }

        setLoading(true);

        try {
            var url = 'api/generate_mishap.php?table=' + encodeURIComponent(table)
                + '&dice1=' + encodeURIComponent(dice1)
                + '&dice2=' + encodeURIComponent(dice2);
            var response = await fetch(url, {
                method: 'GET',
                headers: { 'Accept': 'application/json' },
            });

            if (!response.ok) {
                throw new Error('HTTP failure: ' + response.status);
            }

            var data = await response.json();
            if (!data.ok || !data.mishap) {
                throw new Error(data.error || 'Invalid server response.');
            }

            renderMishap(data.mishap);
            var tableLabel = data.mishap.table_label || 'Mishap';
            statusDisplay.textContent = tableLabel + ' generated successfully.';
        } catch (error) {
            statusDisplay.textContent = 'Could not generate a mishap right now. Please try again.';
            console.error(error);
        } finally {
            setLoading(false);
        }
    }

    generateButton.addEventListener('click', generateMishap);
});
