import { useState } from 'react'

const BASE_URL = 'http://127.0.0.1:8000'

export default function Test() {
  const [health, setHealth] = useState<string>('')

  async function healthCheck() {
    try {
      const json = await (
        await fetch(`${BASE_URL}/health/check`, { credentials: 'include' })
      ).json()

      setHealth(JSON.stringify(json))
    } catch (err) {
      console.error(err)
    }
  }

  return (
    <div>
      <button onClick={healthCheck}>Health</button>
      <pre>{health}</pre>
    </div>
  )
}
