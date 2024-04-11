// Pridať obsluhu kliknutia na hviezdu
const stars = document.querySelectorAll('.star');
stars.forEach(star => {
  star.addEventListener('click', function() {
    const ratingValue = this.getAttribute('data-value');
    const ratingContainer = document.getElementById('rating');
    ratingContainer.dataset.value = ratingValue;
    // Zobrazenie počtu hviezdičiek v recenzii
    const ratingValueSpan = document.querySelector('.rating-value');
    ratingValueSpan.textContent = ratingValue;
  });
});
// Aktualizácia spätnej väzby pri výbere skóre
const reviewForm = document.getElementById('review-form');
reviewForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Zabrániť štandardnému správaniu formulára

  // Získanie hodnôt z formulára
  const username = document.getElementById('username').value;
  const comment = document.getElementById('comment').value;
  const rating = document.getElementById('rating').dataset.value;
  
// Vytvorenie novej recenzie
const newReview = document.createElement('div');
newReview.classList.add('review');
newReview.innerHTML = `
  <div class="user-info">
    <span class="username">${username}</span>
    <span class="rating"><span class="rating-stars"></span></span>
  </div>
  <p class="comment">${comment}</p>
  <button class="edit-btn">Upraviť</button>
`;

// Získajte kontajner len pre hviezdičky vo vnútri novej recenzie
const starsContainer = newReview.querySelector('.rating-stars');

// Generovanie hviezd
for (let i = 0; i < rating; i++) {
  const star = document.createElement('span');
  star.innerHTML = '&#9733;'; // Použitie znaku hviezdičky Unicode
  starsContainer.appendChild(star);
}

// Pridanie novej recenzie do kontajnera recenzií
const reviewsContainer = document.querySelector('.reviews-container');
reviewsContainer.appendChild(newReview);

// Vymazať polia formulára
document.getElementById('username').value = '';
document.getElementById('comment').value = '';
document.getElementById('rating').dataset.value = '1';

});