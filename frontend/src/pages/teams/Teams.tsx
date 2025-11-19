import { Link, useParams } from 'react-router-dom'
import { useEffect, useState } from 'react'

export default function Teams() {
  const BASE_URL = 'http://127.0.0.1:8000'
  const { categoryId } = useParams()
  const [teams, setTeams] = useState<{ button: any }[]>([])

  async function loadTeams() {
    const json = await (
      await fetch(`${BASE_URL}/categories/teams-index?categoryId=${categoryId}`)
    ).json()
    const teams = json.map((item: any) => {
      return {
        id: item.id,
        name: item.name,
        button: (
          <button key={item.id}>
            <Link to={`/Category/${categoryId}/Team/${item.id}`} id={item.id}>
              {item.name}
            </Link>
          </button>
        ),
      }
    })
    setTeams(teams)
  }

  async function createNewTeam() {
    const userId: number = 1 // (placeholder) todo: get userId of currently logged in user / localstorage

    await fetch(`${BASE_URL}/teams/create`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        category_id: categoryId,
        user_id: userId,
        name: '',
        // created_at: '2007-09-24 00:00:00',
      }),
    })
      .then(res => res.json())
      .then(data => {
        console.log(data)
      })
      .catch(err => console.log(err))

    await loadTeams()
  }

  useEffect(() => {
    loadTeams().then()
  }, [])

  return (
    <div>
      <p>teams in category {categoryId}</p>

      <div>
        {teams.map(category => category.button)}
        <button onClick={createNewTeam}>+</button>
      </div>
    </div>
  )
}
