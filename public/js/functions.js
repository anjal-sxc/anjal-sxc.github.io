 synth = window.speechSynthesis;
 pitch = 1
 rate = 0.8

function say(message) {
    var utterThis = new SpeechSynthesisUtterance(message);
    utterThis.pitch = pitch;
    utterThis.rate = rate;
    synth.speak(utterThis);
}

 window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
 const recognition = new SpeechRecognition();
 let composeMessage = $('#composeMessage');
 let speechToText = '';

 const dictate = () => {
     recognition.start();
     recognition.onresult = (event) => {
         speechToText += event.results[0][0].transcript;
         composeMessage.value = speechToText
     }
 }
