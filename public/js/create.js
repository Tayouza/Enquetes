var inputText = $('<input>').attr('type', 'text')
    .attr('name', 'answer[]')
    .attr('required', '')
    .addClass('form-control my-1 inputAnswerText')
    
var inputBtn = $('<input>').attr('type', 'button')
    .attr('value', 'X')
    .attr('onclick', 'removeInput(this)')
    .addClass('remove-btn')

const url = window.location.host

const newInput = (items = []) => {
    if (items.length < 3) {
        items.length = 3
    }
    for (i = 0; i < items.length; i++) {
        var answerWrapper = $('<div>').addClass('answerWrapper')
        answerWrapper.append(inputText.attr('value', items[i]).clone()).append(inputBtn.clone())
        $('#options').append(answerWrapper)
    }
}

const getAnswers = async (id) => {
    const data = await fetch(`http://${url}/answer/${id}`)
        .then(res => res.json())
        .then(data => {
            const answers = JSON.parse(data.answers)
            newInput(Object.keys(answers))
        })
        .catch(e => { console.log(e) })
}

if ($("#title").attr('key')) {
    getAnswers($("#title").attr('key'))
} else {
    newInput()
}

incrementIDAsnwers()
incrementPlaceholders()

function duplicateInput() {
    var answerWrapper = $('<div>').addClass('answerWrapper')
    answerWrapper.append(inputText.attr('value', '').clone()).append(inputBtn.clone())
    $('#options').append(answerWrapper)
    incrementIDAsnwers()
    incrementPlaceholders()
}

function removeInput(item) {
    if ($("#options").children().length <= 3) {
        swal({
            title: "A enquete deve ter no minimo 3 opções",
            icon: "error"
        })
    } else {
        item.parentNode.remove()
        incrementIDAsnwers()
        incrementPlaceholders()
    }
}

function incrementIDAsnwers() {
    var count = 0
    $('.inputAnswer').each(function () {
        count++
        var newID = 'option' + count
        $(this).attr('id', newID)
        $(this).attr('key', count)
    })
}

function incrementPlaceholders() {
    var count = 0
    $('.inputAnswerText').each(function () {
        count++
        $(this).attr('placeholder', 'Resposta ' + count)
    })
}