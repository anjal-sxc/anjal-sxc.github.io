 synth = window.speechSynthesis;
 pitch = 1
 rate = 0.8

function say(message) {
    var utterThis = new SpeechSynthesisUtterance(message);
    utterThis.pitch = pitch;
    utterThis.rate = rate;
    synth.speak(utterThis);
}
