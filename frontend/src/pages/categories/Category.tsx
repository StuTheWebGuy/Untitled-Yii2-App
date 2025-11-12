import { useParams } from 'react-router-dom'
import Teams from '../teams/Teams.tsx'

export default function Category() {
  const { categoryId } = useParams()

  return (
    <div>
      <h1>category {categoryId}</h1>
      <div>
        <Teams /> {/* just using the test page for now, todo: replace with proper page */}
      </div>
    </div>
  )
}
