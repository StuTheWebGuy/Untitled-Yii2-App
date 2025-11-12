import { Link, useParams } from 'react-router-dom'
import { useEffect, useState } from 'react'

export default function Teams() {
  const BASE_URL = 'http://127.0.0.1:8000'
  const { categoryId } = useParams()
  const [teams, setTeams] = useState<{ id: number; name: string; button: any }[]>([])

  async function loadTeams() {
    const json = await (
      await fetch(`${BASE_URL}/teams/category-view?categoryId=${categoryId}`)
    ).json()
    const teams = json.map((item: any) => {
      return {
        id: item.id,
        name: item.name,
        button: (
          <button key={item.id}>
            <Link to={`/Category/${categoryId}/Team/${item.id}`}>{item.name}</Link>
          </button>
        ),
      }
    })
    setTeams(teams)
  }

  useEffect(() => {
    loadTeams().then()
  })

  return (
    <div>
      <p>teams in category {categoryId}</p>
      <div>{teams.map(team => team.button) ?? [<button>+</button>]}</div>
    </div>
  )
}
