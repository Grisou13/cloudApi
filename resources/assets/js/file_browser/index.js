// Polyfill from https://github.com/reactjs/react-router/issues/1500
if(typeof require.ensure !== "function") require.ensure = function(d, c) { c(require) };
module.exports = {
    path:"files",
    getComponent(location, cb) {
        require.ensure([], (require) => {
            cb(null, require('./components/FileBrowser'));
        })
    }
}
