function clickCard() {
  // https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_onclick_html
  document.getElementById("flashcard").innerHTML = "むずかしい"; // show the answer
  document.getElementById("flashcard").style.backgroundImage = ""; // is there a better way to set this to nothing?
  // get buttons to appear
  document.getElementById("both_buttons").style.visibility = "visible";
}
