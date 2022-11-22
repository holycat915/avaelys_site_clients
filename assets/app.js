/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// You can specify which plugins you need
// import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
// import './bootstrap';


// Barre de progression
let i = 1;

function changerEtape(){
    if(i<=4){
        document.querySelector('.circle:nth-of-type(' + i + ')').classList.add("pending");
    }
    if(i>=2 && i<=5){
        document.querySelector('.circle:nth-of-type(' + (i-1) + ')').classList.remove("pending");
        document.querySelector('.circle:nth-of-type(' + (i-1) + ')').classList.add("done");
        if(i<5){
            document.querySelector('.bar:nth-of-type(' + (i-1) + ')').classList.add("pending");
        }
    }
    if(i>=3 && i<=5){
        document.querySelector('.bar:nth-of-type(' + (i-2) + ')').classList.remove("pending");
        document.querySelector('.bar:nth-of-type(' + (i-2) + ')').classList.add("done");
    }
    // Effacement de la barre progression
    if(i == 6){
        i = 0
        for(let index=1; index<=4; index++){
            document.querySelector('.circle:nth-of-type(' + (index) + ')').classList.remove("done");
            if(index<4){
                document.querySelector('.bar:nth-of-type(' + (index) + ')').classList.remove("done");
            }
        }
    }
    i++;
}

const infos =document.querySelector(".infos");
const btn =infos.querySelector(".change");

btn.addEventListener("click", function(){
    changerEtape();
})

