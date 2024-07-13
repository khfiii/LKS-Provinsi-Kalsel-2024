// document.addEventListener('DOMContentLoaded', function() {
//     const stars = document.querySelectorAll('.star');

//     stars.forEach(star => {
//         star.addEventListener('mousemove', function(e) {
//             const rect = this.getBoundingClientRect();
//             const xPos = e.clientX - rect.left;

//             if (xPos < rect.width / 2) {
//                 this.style.setProperty('--star-fill', '50%');
//             } else {
//                 this.style.setProperty('--star-fill', '100%');
//             }
//         });

//         star.addEventListener('mouseout', function() {
//             this.style.setProperty('--star-fill', '0');
//         });
//     });
// });
