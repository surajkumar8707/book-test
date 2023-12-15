//---remove layout (create-duplicate page)---
function removeGrandparent(element) {
    var grandparent = element.parentElement.parentElement;
    grandparent.remove();
}
