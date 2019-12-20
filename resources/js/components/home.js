import React from 'react';
import M from 'minimatch';


export default class Home extends React.Component {
    constructor(props) {
        super(props);

        this.state = {

        }
    }

    componentDidMount() {

    }

    render() {
        return (
            <div id="hmBackground">
                
                <div className="row hide" id="registrationSect">
                    <div className="col l12">
                        <h2 className="center-align">Create PREP50 Account</h2>
                    </div>
                    <form className="col l6 offset-l3">
                        <div className="row">
                            <div className="input-field col l4">
                                <input name="fName" id="fName" type="text" className="validate"/>
                                <label for="fName">Firstname</label>
                            </div>
                            <div className="input-field col l4">
                                <input name="oName" id="oName" type="text" className="validate"/>
                                <label for="oName">Othername <small>Optional</small></label>
                            </div>
                            <div className="input-field col l4">
                                <input name="sName" id="sName" type="text" className="validate"/>
                                <label for="sName">Surname</label>
                            </div>
                        </div>
                        <div className="row">
                            <div className="input-field col l4">
                                <input id="phone" type="text" className="validate"/>
                                <label for="phone">Phone Number</label>
                            </div>
                            <div className="col l4" id="gender">
                                <label>
                                    <input name="gender" type="radio" value="M"/>
                                    <span>Male</span>
                                </label>
                                <label>
                                    <input name="gender" type="radio" value="F"/>
                                    <span>Female</span>
                                </label>
                            </div>
                            <div className="input-field col l4">
                                <input id="email" type="email" className="validate"/>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div className="row">
                            <div className="input-field col l6">
                                <select id="state">
                                    <option value="-"selected>Choose your State</option>
                                </select>
                                <label>Select State</label>
                            </div>
                            <div className="input-field col l6">
                                <select id="dept">
                                    <option value="-"selected>Choose your Department</option>
                                </select>
                                <label>Select Department</label>
                            </div>
                        </div>
                        <div className="row">
                            <div className="input-field col l6">
                                <select id="poly">
                                    <option value="-"selected>Choose your Polytechnic</option>
                                </select>
                                <label>Select Polytechnic</label>
                            </div>
                            <div className="input-field col l6">
                                <select id="uni">
                                    <option value="-"selected>Choose your University</option>
                                </select>
                                <label>Select University</label>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col l12 center-align">
                                <button className="btn waves-effect waves-light">Submit <i className="material-icons right">send</i></button>
                            </div>
                        </div>
                    </form>
                    <div className="col l12 center-align">
                        <p>Already have an account?</p>
                        <a href="#">Login</a>
                    </div>
                </div>
                <div className="row" id="loginSect">
                    <div className="col l12">
                        <h2 className="center-align">Log into PREP50</h2>
                    </div>
                    <form className="col l6 offset-l3">
                        <div className="row">
                            <div className="input-field col l6 offset-l3">
                                <input name="regNum" id="regNum" type="text" className="validate"/>
                                <label for="regNum">PREP50 Reg. Number <small>( 10 digits )</small></label>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col l12 center-align">
                                <button className="btn waves-effect waves-light">Login <i className="material-icons right">send</i></button>
                            </div>
                        </div>
                    </form>
                    <div className="col l12 center-align">
                        <p>Don't have an account?</p>
                        <a href="#">Register</a>
                    </div>
                </div>
            </div>
        );
    }
}