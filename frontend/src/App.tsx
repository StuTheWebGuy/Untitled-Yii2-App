import { Routes, Route, Link } from 'react-router-dom'
import Home from './pages/Home'
import Test from './pages/Test.tsx'
import Categories from './pages/categories/Categories.tsx'
import Category from './pages/categories/Category.tsx'
import Teams from './pages/teams/Teams.tsx'
import Team from './pages/teams/Team.tsx'

function App() {
  return (
    <div>
      <nav>
        <Link to="/">Home</Link> | <Link to="/Test">Test</Link> |{' '}
        <Link to="/Categories">Categories</Link>
      </nav>

      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/Test" element={<Test />} />
        <Route path="/Categories" element={<Categories />} />
        <Route path="/Category/:categoryId" element={<Category />} />
        <Route path="/Category/:categoryId/Teams" element={<Teams />} />
        <Route path="/Category/:categoryId/Team/:teamId" element={<Team />} />
      </Routes>
    </div>
  )
}

export default App
/* todo:
    - add caching layer to categories, teams, etc. index calls
    - make full login page wireframe
    - fetch moves for pokemon on team page
    - fix rest of pages to use the new default naming middleware that categories now uses to reduce api calls
    - add menu pages for teams, boxes, etc.
    - start abstracting out repeated api calls and functions to reduce code duplication
    - add a styling palette and start to beautify
*/
