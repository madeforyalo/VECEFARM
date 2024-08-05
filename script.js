document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('floatingPassword');
    const capsLockMessage = document.getElementById('caps-lock-message');

    function checkCapsLock(event) {
        const isCapsLock = event.getModifierState && event.getModifierState('CapsLock');
        if (isCapsLock) {
            capsLockMessage.style.display = 'flex';
        } else {
            capsLockMessage.style.display = 'none';
        }
    }

    // Verificar el estado de Caps Lock al cargar la página
    function initialCapsLockCheck() {
        const e = new KeyboardEvent('keydown', {key: 'CapsLock'});
        checkCapsLock(e);
    }

    passwordInput.addEventListener('keydown', checkCapsLock);
    passwordInput.addEventListener('keyup', checkCapsLock);

    //verifica si bloq mayus esta activo al iniciar o actualizar la pagina.
    initialCapsLockCheck();
    
});


