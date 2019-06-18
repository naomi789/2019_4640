//  Be sure to make a Flipper object first.
var flipper = new Flipper(document.getElementById("example-row"));

$('#first').click(function(e) {
  // make sure you put logical href links for people without javascript
  e.preventDefault();
  flipper.setCards([{
    // there is only one column for this example. add more full cards and then add here dictionaries to switch them.
    cardIndex: "0",
    activeIndex: "1"
  }]);
});
