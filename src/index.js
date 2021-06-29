import { render, Component } from "@wordpress/element";
import Hello from "./components/Hello";

class App extends Component {
  render() {
    return (
      <>
        <h1>Hello React</h1>
        <Hello />
      </>
    );
  }
}

render(<App />, document.getElementById("react-app"));
