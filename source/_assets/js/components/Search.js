fuseSearch = {
    fuse: null,
    searchIndex: null,
    results: null,
    query: null,
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
    console.log(window.fuseSearch.query);
    // window.fuseSearch.fuse.search();
}
