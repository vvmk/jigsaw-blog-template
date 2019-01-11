fuseSearch = {
    fuse: null,
    searchIndex: null,
    results: null,
    query: null,
    searching: false,
};

window.fuseSearch.fuse = require('fuse.js');

axios('/index.json').then(response => {
    window.fuseSearch.index = new window.fuseSearch.fuse(response.data, {
        minMatchCharLength: 6,
        keys: ['title', 'snippet', 'categories'],
    });
});

window.fuseSearch.search = function()
{
    window.fuseSearch.query = document.getElementById('search-input').value;

    if (window.fuseSearch.query.length) {
        window.fuseSearch.searching = true;
        document.getElementById('search-input').classList.add('transition-border');
        document.getElementById('search-results').classList.remove('hidden');
        document.getElementById('search-reset-button').classList.remove('hidden');
    } else {
        window.fuseSearch.reset();
    }
}

window.fuseSearch.reset = function()
{
    window.fuseSearch.query = null;
    window.fuseSearch.searching = false;

    document.getElementById('search-input').value = '';
    document.getElementById('search-input').classList.remove('transition-border');
    document.getElementById('search-results').classList.add('hidden');
    document.getElementById('search-reset-button').classList.add('hidden');
}
