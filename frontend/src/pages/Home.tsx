export default function Home() {
  const BASE_URL = 'http://127.0.0.1:8000'
  async function loginDev() {
    await fetch(`${BASE_URL}/auth/login`, {
      method: 'POST',
      headers: {
        'content-type': 'application/json',
      },
      body: JSON.stringify({
        username: 'test',
        password: 'test',
      }),
    })
  }

  return (
    <div>
      <h1>Home Page</h1>
      <button onClick={loginDev}>login</button>
    </div>
  )
}
