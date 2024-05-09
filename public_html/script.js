const saveButton = document.getElementById("save-button");
const mealDisplay = document.getElementById("meal-display");

saveButton.addEventListener("click", function() {
  const breakfast = document.getElementById("breakfast-input").value;
  const lunch = document.getElementById("lunch-input").value;
  const snack = document.getElementById("snack-input").value;
  const dinner = document.getElementById("dinner-input").value;

  // You can store the meals in localStorage or a database here
  // This example just displays them for demonstration

  let displayedMeals = "";

  if (breakfast) {
    displayedMeals += `Breakfast: ${breakfast}<br>`;
  }
  if (lunch) {
    displayedMeals += `Lunch: ${lunch}<br>`;
  }
  if (snack) {
    displayedMeals += `Snack: ${snack}<br>`;
  }
  if (dinner) {
    displayedMeals += `Dinner: ${dinner}<br>`;
  }

  mealDisplay.innerHTML = displayedMeals;
});
