function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
    }
          

    let array = ["Comment est fait le fromage de chèvre ?1", "Qu'est-ce qu'il y a dans le fromage ?2", "Le beaufort est un fromage de3"];
    console.log(shuffleArray(array));