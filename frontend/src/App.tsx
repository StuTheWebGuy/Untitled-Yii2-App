import { useState } from "react";

export default function BackendTest() {
  const [response, setResponse] = useState<string>("");

  async function testBackend() {
    try {
      const res = await fetch("http://127.0.0.1:8000/health/check");
      const json = await res.json();
      setResponse(JSON.stringify(json));
    } catch (err) {
      console.error(err);
    }
  }

  return (
    <div>
      <button onClick={testBackend}>Test</button>
      <pre>{response}</pre>
    </div>
  );
}
