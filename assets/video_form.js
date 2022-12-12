const formVideo = document.querySelector('#video_form');
const videosList = document.querySelector('#videos_list');


formVideo.addEventListener('submit', function (e){
    e.preventDefault();

    fetch(this.action, {
        body: new FormData(e.target),
        method: 'POST'
    })
        .then(response => response.json())
        .then(json => {
            // console.log(json);
            handleResponse(json);
        });
})

const handleResponse = function(response){
    switch(response.code){
        case 'VIDEO_ADDED_SUCCESSFULLY':
            videosList.innerHTML += response.html;
            break;
    }
}