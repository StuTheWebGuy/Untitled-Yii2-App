import { useParams } from 'react-router-dom'
import Test from '../Test.tsx'
export default function Team() {
  const { categoryId } = useParams()

  return (
    <div>
      <h1>category {categoryId}</h1>
      <div>
        <Test /> {/* just using the test page for now, todo: replace with proper page */}
      </div>
    </div>
  )
}
