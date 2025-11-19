export default function CategoryMenu({ x, y }: { x: number; y: number }) {
  return (
    <div
      style={{
        backgroundColor: 'grey',
        position: 'absolute',
        zIndex: 1000,
        left: x,
        top: y,
        opacity: 0.9,
      }}
    >
      <ul
        style={{
          listStyleType: 'none',
          margin: 0,
          padding: 20,
        }}
      >
        <li>
          <button style={{ cursor: 'pointer' }}>test</button>
        </li>
        <li>
          <button style={{ cursor: 'pointer' }}>test2</button>
        </li>
      </ul>
    </div>
  )
}
