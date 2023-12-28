const input = document.querySelector(".filter")
const allOneStudents = document.querySelectorAll(".one-student")

const allOneStudentsArray = Array.from(allOneStudents)
const allStudentsDiv = document.querySelector(".all-students")

// Studnts to Objects = pole Objektů
const studentsObjects = allOneStudentsArray.map((oneStudent, index) => {
    return {
        id: index,
        studentsName: oneStudent.querySelector("h2").textContent,
        studentsLink: oneStudent.querySelector("a")
    }
})

input.addEventListener("input", () => {
    const inputText = input.value.toLowerCase()

    const filterStudents = studentsObjects.filter( (oneStudent) => {
        return oneStudent.studentsName.toLowerCase().includes(inputText)

    })

    //vymazat všechny ze stránky
    allStudentsDiv.textContent =""

    filterStudents.map( (oneFilterStudent) => {
        const newDiv = document.createElement("div")
        newDiv.classList.add("one-student")

        const newH2 = document.createElement("h2")
        newH2.textContent = oneFilterStudent.studentsName
        newDiv.append(newH2)

        newDiv.append(oneFilterStudent.studentsLink)

        allStudentsDiv.append(newDiv)
    })

})