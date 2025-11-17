import { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'

export default function Categories() {
  const [categories, setCategories] = useState<{ button: any }[]>([])
  const BASE_URL = 'http://127.0.0.1:8000'
  async function createNewCategory() {
    const userId: number = 1 // (placeholder) todo: get userId of currently logged in user / localstorage
    const userCategoryCount: number = await (
      await fetch(`${BASE_URL}/categories/users-count?userId=${userId}`)
    ).json()

    await fetch(`${BASE_URL}/categories/create`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        user_id: userId,
        name: `Untitled Category ${userCategoryCount}`,
        created_at: '2007-09-24 00:00:00',
      }),
    })
      .then(res => res.json())
      .then(data => {
        console.log(data)
      })
      .catch(err => console.log(err))

    await loadCategories()
  }

  async function loadCategories() {
    const json = await (await fetch(`${BASE_URL}/categories/index`)).json()
    const category = json.items.map((item: any) => {
      return {
        button: (
          <button key={item.id}>
            <Link to={`/Category/${item.id}`}>{item.name}</Link>
          </button>
        ),
      }
    })
    setCategories(category)
  }

  useEffect(() => {
    loadCategories().then()
  }, [])

  return (
    <div>
      <div>
        {categories.map(category => category.button)}
        <button onClick={createNewCategory}>+</button>
      </div>
    </div>
  )
}
