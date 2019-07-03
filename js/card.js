function clickCard(word) {
  // console.log('this is a word' + word);
  document.getElementById("flashcard").innerHTML = word; // show the answer
  document.getElementById("flashcard").style.backgroundImage = ""; // is there a better way to set this to nothing?
  // get buttons to appear
  document.getElementById("both_buttons").style.visibility = "visible";
}
