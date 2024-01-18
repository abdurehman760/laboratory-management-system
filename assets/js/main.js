document.addEventListener("DOMContentLoaded", function () {
  // Your JavaScript code to run when the document is loaded
  var totalAmount = document.getElementById("totalAmount");
  var testsInput = document.querySelector(".patient-add-form #tests");
  testsInput.addEventListener("change", function () {
    var total = 0;
    // get selected items in array
    const selectedTests = Array.from(testsInput.selectedOptions);
    // loop through items to get  data-price attribute data from this and sum it to variable total.
    for (let i of selectedTests) {
      let price = parseInt($(i).data("price"));
      if (!isNaN(price)) {
        total += price;
      }
    }
    totalAmount.innerText = total;
  });
});
