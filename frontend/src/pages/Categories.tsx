import { useEffect, useState } from 'react'

export default function Categories() {
  const [categories, setCategories] = useState<{ id: number; name: string }[]>([])
  const BASE_URL = 'http://127.0.0.1:8000'
  async function createNewCategory() {
    const userId: number = 1 // (placeholder) todo: get userId of currently logged in user / localstorage
    const userTeamCount: number = await (
      await fetch(`${BASE_URL}/categories/users-count?userId=${userId}`)
    ).json()

    await fetch(`${BASE_URL}/categories/create`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        userId: userId,
        name: `Untitled Category ${userTeamCount}`,
        created_at: '2007-09-24 00:00:00',
      }),
    })
      .then(res => res.json())
      .then(data => {
        console.log(data)
      })
      .catch(err => console.log(err))
  }

  async function loadCategories() {
    await fetch(`${BASE_URL}/categories/index`)
  }

  useEffect(() => {
    loadCategories().then()
  }, [])

  return (
    <div>
      <div>
        <button onClick={createNewCategory}>Create a Category</button>
      </div>

      <div>{categories}</div>
    </div>
  )
}
