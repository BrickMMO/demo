
const prompt = document.getElementById("prompt");
const reset = document.getElementById("reset");
const generate = document.getElementById("generate");

function loadPrompt()
{
    const url = "prompt.php";

    const fetchPromise = fetch(url, {mode: "no-cors"})
        .then((response) => response.text())
        .then((data) => {

            prompt.value = data;
    });
}

(function () {
    loadPrompt();
})();


reset.addEventListener("click", function(){
    loadPrompt();
});

generate.addEventListener("click", getMp3);

async function getMp3()

{

    const data = new FormData();
    data.append('prompt', prompt.value);

    const url = "audio.php";

    const fetchPromise = await fetch(url, {
            method: 'POST', 
            mode: "no-cors", 
            headers: {
                'Accept': 'application/json',
            },
            body: data,
        })
        .then((response) => response.text())
        .then((data) => {

            prompt.value = data;
            
    });

}
