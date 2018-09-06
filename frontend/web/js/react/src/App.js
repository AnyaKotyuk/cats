import React, { Component } from 'react';
import {Container} from 'reactstrap';
// import ArticleList from "./components/articleList";
// import ArticleForm from "./components/articleForm";
import { Provider } from "react-redux";
import store from "./store/index";

class App extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        const El = require('./components/'+this.props.component).default;
        return (
            <Provider store={store}>
                <Container fluid className="App p-0">
                    <El />
                </Container>
            </Provider>
        );
    }
}

export default App;
