let bubbleCount = 50;

function createBubble() {
    let bubble = document.createElement('div');
    bubble.classList.add('bubble');
    bubble.style.left = Math.random() * 100 + '%';
    bubble.style.animationDuration = Math.random() * 3 + 2 + 's';
    document.body.appendChild(bubble);

    bubble.addEventListener('animationend', function () {
        bubble.remove();
    });
}

for (let i = 0; i < bubbleCount; i++) {
    createBubble();
}