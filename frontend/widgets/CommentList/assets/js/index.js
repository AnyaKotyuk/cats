// import store from "../../../../web/js/react/src/store";
// import App from "../../../../web/js/react/src/App";

document.addEventListener("DOMContentLoaded", function(event) {
    render(
        <Provider store={store}>
            <App />
        </Provider>,
        document.getElementById('root')
    );
});