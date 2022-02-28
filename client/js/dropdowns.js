function loadData(dropdown, startValue, endValue, increaseBy = null){
    var options = "";
    if(increaseBy){
        for(var start = startValue; start <= endValue; start += increaseBy){
            options += "<option>"+ start +"</option>";
        }
    }
    for(var start = startValue; start <= endValue; start++){
      options += "<option>"+ start +"</option>";
    }
    document.getElementById(dropdown).innerHTML += options;
}

loadData("userAge", 18, 99)
loadData("userWeight", 18, 99)
loadData("userHeight", 1.40, 2.00, 0.01)

loadData("minAgeOfPotentialCandidate", 18, 99)
loadData("maxAgeOfPotentialCandidate", 18, 99)
loadData("minWeightOfPotentialCandidate", 18, 99)
loadData("maxWeightOfPotentialCandidate", 18, 99)
loadData("minHeightOfPotentialCandidate", 1.40, 2.00, 0.01)
loadData("maxHeightOfPotentialCandidate", 1.40, 2.00, 0.01)

