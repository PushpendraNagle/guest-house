function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 'Project_Fund' ? 'block' : 'none';
}