document.addEventListener('DOMContentLoaded', function() {
    const initProfesionalesBlock = () => {
        // Use a more specific selector context if possible, but global is okay for now
        const openBtns = document.querySelectorAll('.open-lightbox-btn');
        const closeBtns = document.querySelectorAll('.close-lightbox-btn');
        const modals = document.querySelectorAll('.lightbox-modal');

        openBtns.forEach(btn => {
            if (btn.dataset.bound) return;
            btn.dataset.bound = true;

            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = btn.getAttribute('data-target');
                const modal = document.getElementById(targetId);
                if (modal) {
                    modal.classList.remove('acfb-hidden');
                    document.body.style.overflow = 'hidden';
                }
            });
        });

        closeBtns.forEach(btn => {
            if (btn.dataset.bound) return;
            btn.dataset.bound = true;

            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const modal = btn.closest('.lightbox-modal');
                if (modal) {
                    modal.classList.add('acfb-hidden');
                    document.body.style.overflow = '';
                }
            });
        });

        modals.forEach(modal => {
            if (modal.dataset.bound) return;
            modal.dataset.bound = true;

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('acfb-hidden');
                    document.body.style.overflow = '';
                }
            });
        });
    };

    // Run on frontend
    initProfesionalesBlock();

    // Run in editor
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=acf/profesionales', initProfesionalesBlock);
    }
});
