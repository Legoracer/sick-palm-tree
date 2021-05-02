// Vertical scroll by dragging
(() => {
            
    // God help us
    const sliders = document.querySelectorAll('.draggable');

    let startX = [];
    let scrollLeft = [];
    let mouseDown = [];
    
    const startDragging = (e) => {
        let i = e.currentTarget.i;
        mouseDown[i] = true;
        startX[i] = e.pageX - sliders[i].offsetLeft;
        scrollLeft[i] = sliders[i].scrollLeft;
    };

    const stopDragging = (e) => {
        let i = e.currentTarget.i;
        mouseDown[i] = false;
    };
    
    for (let i=0;i<sliders.length;i++) {
        mouseDown[i] = false;
        sliders[i].i = i;
        sliders[i].addEventListener('mousemove', (e) => {
            e.preventDefault();
            let i = e.currentTarget.i;
            if (!mouseDown[i]) { return; }
            console.log(e);
            const x = e.pageX - sliders[i].offsetLeft;
            const scroll = x - startX[i];
            sliders[i].scrollLeft = scrollLeft[i] - scroll;
        });
        sliders[i].addEventListener('mousedown', startDragging, false);
        sliders[i].addEventListener('mouseup', stopDragging, false);
        sliders[i].addEventListener('mouseleave', stopDragging, false);
    }
})();