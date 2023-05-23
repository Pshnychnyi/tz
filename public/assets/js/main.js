const modals = document.querySelectorAll('[data-modal]');

modals.forEach(function (trigger) {
    trigger.addEventListener('click', function (event) {
        event.preventDefault();

        const modal = document.getElementById(trigger.dataset.modal);
        const exits = modal.querySelectorAll('.modal__close');

        modal.classList.add('modal--open');
        exits.forEach(function (exit) {
            exit.addEventListener('click', function (event) {
                event.preventDefault();
                modal.classList.remove('modal--open');
            });
        });
    });
});
