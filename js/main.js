function confirmDeletion(url) {
    if (confirm('Etes-vous sûr de vouloir supprimer cet article ?')) {
        window.location.href = url;
    } else {
        return false;
    }
}