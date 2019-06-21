function clickCard() {
  document.getElementById("flashcard").innerHTML = "むずかしい"; // show the answer
  document.getElementById("flashcard").style.backgroundImage = ""; // is there a better way to set this to nothing?
  // get buttons to appear
  document.getElementById("both_buttons").style.visibility = "visible";
}

function reportAnswer(correct) {
  if (correct) {
    console.log('correct');
    // use PHP to store this in DB so we know how often people are getting it wrong
  } else {
    console.log('nope');
    // use PHP to store this in DB so we know how often people are getting it wrong
  }
}
