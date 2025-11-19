import { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'
import CategoryMenu from './CategoryMenu.tsx'
import { createPortal } from 'react-dom'

export default function Categories() {
  const [categories, setCategories] = useState<{ button: any }[]>([])
  const [isCategoryMenuVisible, setIsCategoryMenuVisible] = useState<boolean>(false)
  const [categoryMenuPosition, setCategoryMenuPosition] = useState<{ x: number; y: number }>({
    x: 0,
    y: 0,
  })
  const BASE_URL = 'http://127.0.0.1:8000'
  const portalRoot = document.getElementById('portal-root')

  async function createNewCategory() {
    const userId: number = 1 // (placeholder) todo: get userId of currently logged in user / localstorage

    await fetch(`${BASE_URL}/categories/create`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        user_id: userId,
        name: '', // let server allocate a default name
        created_at: '2007-09-24 00:00:00', // todo: get current date in this format
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
