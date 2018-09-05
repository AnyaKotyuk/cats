import React, {Component} from 'react';

class ArticleForm extends Component{

    constructor(props) {
        super(props);
    }

    render() {
        return (<input
            type="text"
            name="text"
            onBlur={this.props.handleBlur.bind(this)}
            value={this.props.value}
            onChange={this.props.handleChange}
        />);
    }
}

export default ArticleForm;