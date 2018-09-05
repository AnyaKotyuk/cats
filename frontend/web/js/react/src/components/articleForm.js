import React, {Component} from 'react';
import { addArticle } from "../actions/index";
import { connect } from "react-redux";
import uuidv1 from "uuid";

class ArticleForm extends Component{

    constructor(props) {
        super(props);
        this.state = {
            inputValue: ''
        }
    }

    handleChange(e) {
        const state = this.state;
        state.inputValue = e.target.value;
        this.setState(state);
    }

    handleBlur(e) {

        const data = {
            title: e.target.value,
            id: uuidv1()
        };
        this.props.addArticle(data);

        const state = this.state;
        state.inputValue = '';
        this.setState(state);
    }

    render() {
        return (<input
            type="text"
            name="text"
            onBlur={this.handleBlur.bind(this)}
            value={this.state.inputValue}
            onChange={this.handleChange.bind(this)}
        />);
    }
}

const mapDispatchToProps = dispatch => ({
    addArticle : (data) => dispatch(addArticle(data))
});

export default connect(null, mapDispatchToProps)(ArticleForm);