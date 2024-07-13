const cursor = document.querySelector('.custom-cursor');

document.addEventListener('mousemove', e => {
    cursor.style.left = e.clientX + 'px';
    cursor.style.top = e.clientY + 'px';
});

document.addEventListener('mousedown', e => {
    const pulse = document.createElement('span');
    pulse.classList.add('pulse');
    pulse.style.left = `${e.clientX - 5}px`;
    pulse.style.top = `${e.clientY - 10}px`;
    document.body.appendChild(pulse);

    setTimeout(() => {
        pulse.remove();
    }, 600); // Durasi animasi pulse
});
