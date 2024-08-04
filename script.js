//funcion mayusculas activadas
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

    passwordInput.addEventListener('keydown', checkCapsLock);
    passwordInput.addEventListener('keyup', checkCapsLock);
});

