
const promptInput = document.getElementById("prompt_input");
const responseInput = document.getElementById("response_input");
const scriptInput = document.getElementById("script_input");

const promptButton = document.getElementById("prompt_button");
const responseButton = document.getElementById("response_button");
const scriptButton = document.getElementById("script_button");
const generateButton = document.getElementById("generate_button");
const resetButton = document.getElementById("reset_button");

const audio = document.getElementById("audio");

const message = document.getElementById("message");
const overlay = document.getElementById("overlay");

promptButton.addEventListener("click", function(){

    promptInput.style.display = "block";
    responseInput.style.display = "none";
    scriptInput.style.display = "none";

});

scriptButton.addEventListener("click", function(){

    promptInput.style.display = "none";
    responseInput.style.display = "none";
    scriptInput.style.display = "block";

});

responseButton.addEventListener("click", function(){

    promptInput.style.display = "none";
    responseInput.style.display = "block";
    scriptInput.style.display = "none";

});

function loadPrompt()
{
    const url = "prompt.txt";

    const fetchPromise = fetch(url, {mode: "no-cors"})
        .then((response) => response.text())
        .then((data) => {

            promptInput.value = data;
    });
}

(function () {
    promptButton.click();
    loadPrompt();
})();

resetButton.addEventListener("click", function(){
    promptInput.value = "";
    responseInput.value = "";
    scriptInput.value = "";

    audio.pause();

    loadPrompt();
});

generateButton.addEventListener("click", generateResponse);

async function generateResponse()
{

    overlay.style.display = "flex";
    message.innerHTML = "Generating a Script";

    const data = new FormData();
    data.append('prompt', promptInput.value);

    const url = "response.php";

    const fetchPromise = await fetch(url, {
        method: 'POST', 
        mode: "no-cors", 
        headers: {
            'Accept': 'application/json',
        },
        body: data,
    })
    .then((response) => response.json())
    .then((json) => {

        responseInput.value = JSON.stringify(json);
        scriptInput.value = json.choices[0].message.content;

        generateMp3();

        // audio.src = 'data:audio/mp3;base64, ' + json.choices[0].message.audio.data;
        // audio.play(); 
        
    });

}

async function generateMp3()
{

    message.innerHTML = "Generating an Audio File";

    const data = new FormData();
    data.append('script', scriptInput.value);

    console.log(scriptInput.value);

    const url = "mp3.php";

    const fetchPromise = await fetch(url, {
        method: 'POST', 
        mode: "no-cors", 
        headers: {
            'Accept': 'application/json',
        },
        body: data,
    })
    .then((response) => response.json())
    .then((json) => {

        console.log(json);

        audio.src = "audio/" + json.filename;
        audio.play();

        overlay.style.display = "none";
        
    });

}
