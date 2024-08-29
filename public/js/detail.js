
document.querySelectorAll('.vote-buttons').forEach(function(voteButtons) {
    const upvoteButton = voteButtons.querySelector('.upvote');
    const downvoteButton = voteButtons.querySelector('.downvote');
    const voteCount = voteButtons.querySelector('.vote-count');

    let count = parseInt(voteCount.textContent, 10);
    let voteState = 0; 

    upvoteButton.addEventListener('click', function() {
        if (voteState === -1) {
            count += 2; 
            voteState = 1;
        } else if (voteState === 1) {
            count--; 
            voteState = 0;
        } else {
            count++; 
            voteState = 1;
        }
        voteCount.textContent = count;
        updateButtonStates();
    });

    downvoteButton.addEventListener('click', function() {
        if (voteState === 1) {
            count -= 2; 
            voteState = -1;
        } else if (voteState === -1) {
            count++; 
            voteState = 0;
        } else {
            count--; 
            voteState = -1;
        }
        voteCount.textContent = count;
        updateButtonStates();
    });

    function updateButtonStates() {
        if (voteState === 1) {
            upvoteButton.classList.add('upvote-active');
            downvoteButton.classList.remove('downvote-active');
        } else if (voteState === -1) {
            downvoteButton.classList.add('downvote-active');
            upvoteButton.classList.remove('upvote-active');
        } else {
            upvoteButton.classList.remove('upvote-active');
            downvoteButton.classList.remove('downvote-active');
        }
    }
});
