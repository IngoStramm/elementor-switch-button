window.addEventListener('load', function () {

    function selected_option_remove_active_class(selected_options) {
        for (i = 0; i < selected_options.length; i++) {
            const selected_option = selected_options[i];
            selected_option.parentNode.classList.remove('active');
        }
    }

    function selected_option_eventListener(selected_option, selected_options, esb_panels) {
        selected_option.addEventListener('change', function () {
            selected_option_remove_active_class(selected_options);
            selected_option.parentNode.classList.add('active');
            for (i = 0; i < esb_panels.length; i++) {
                const esb_panel = esb_panels[i];
                esb_panel.style.display = 'none';
            }
            document.querySelector('[' + selected_option.value + ']').style.display = 'block';
        });
    }
    const esb_wrappers = document.querySelectorAll('[data-esb-wrapper]');

    for (a = 0; a < esb_wrappers.length; a++) {
        const esb_wrapper = esb_wrappers[a];
        const esb_controls = esb_wrapper.querySelector('[data-esb-controls]');
        const selected_options = esb_controls.querySelectorAll('input[type=radio][name="selected-option"]');
        const esb_panels = esb_wrapper.querySelectorAll('.esb-panel');
        for (b = 0; b < selected_options.length; b++) {
            const selected_option = selected_options[b];
            selected_option_eventListener(selected_option, selected_options, esb_panels);
        }
    }
});